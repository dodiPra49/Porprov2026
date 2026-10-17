const express = require('express');
const router = express.Router();
const pool = require('../config/db');

// GET /api/v1/cheers - Pesan Dukungan Supporter Terverifikasi
router.get('/', async (req, res) => {
  const { limit = 20 } = req.query;

  try {
    const [rows] = await pool.query(
      `
      SELECT 
        sc.id,
        sc.sender_name,
        sc.sender_city,
        sc.message,
        sc.likes_count,
        sc.created_at,
        c.name AS contingent_name,
        c.code AS contingent_code,
        c.color_hex
      FROM supporters_cheers sc
      JOIN contingents c ON sc.contingent_id = c.id
      WHERE sc.is_approved = 1
      ORDER BY sc.created_at DESC
      LIMIT ?
    `,
      [parseInt(limit)]
    );

    res.json({
      success: true,
      count: rows.length,
      data: rows,
    });
  } catch (error) {
    res.status(500).json({
      success: false,
      message: 'Gagal memuat pesan dukungan.',
      error: error.message,
    });
  }
});

// POST /api/v1/cheers - Kirim Pesan Dukungan Baru dari Publik
router.post('/', async (req, res) => {
  const { contingent_id, sender_name, sender_city, message } = req.body;

  if (!contingent_id || !sender_name || !message) {
    return res.status(400).json({
      success: false,
      message: 'Nama pengirim, kontingen, dan pesan dukungan wajib diisi.',
    });
  }

  try {
    const [result] = await pool.query(
      `
      INSERT INTO supporters_cheers 
      (contingent_id, sender_name, sender_city, message, likes_count, is_approved, created_at, updated_at)
      VALUES (?, ?, ?, ?, 0, 1, NOW(), NOW())
    `,
      [contingent_id, sender_name, sender_city || 'Sumatera Barat', message]
    );

    res.status(201).json({
      success: true,
      message: 'Terima kasih! Pesan dukungan Anda berhasil dikirim ke dinding Porprov.',
      id: result.insertId,
    });
  } catch (error) {
    res.status(500).json({
      success: false,
      message: 'Gagal mengirim pesan dukungan.',
      error: error.message,
    });
  }
});

// POST /api/v1/cheers/:id/like - Tambah Like ke Ucapan
router.post('/:id/like', async (req, res) => {
  const { id } = req.params;

  try {
    await pool.query('UPDATE supporters_cheers SET likes_count = likes_count + 1 WHERE id = ?', [id]);
    res.json({
      success: true,
      message: 'Dukungan disukai.',
    });
  } catch (error) {
    res.status(500).json({
      success: false,
      message: 'Gagal menyukai pesan dukungan.',
    });
  }
});

module.exports = router;
