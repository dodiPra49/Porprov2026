const express = require('express');
const router = express.Router();
const pool = require('../config/db');

// GET /api/v1/contingents
router.get('/contingents', async (req, res) => {
  try {
    const [rows] = await pool.query('SELECT * FROM contingents ORDER BY name ASC');
    res.json({ success: true, count: rows.length, data: rows });
  } catch (error) {
    res.status(500).json({ success: false, error: error.message });
  }
});

// GET /api/v1/sports
router.get('/sports', async (req, res) => {
  try {
    const [rows] = await pool.query('SELECT * FROM sports ORDER BY name ASC');
    res.json({ success: true, count: rows.length, data: rows });
  } catch (error) {
    res.status(500).json({ success: false, error: error.message });
  }
});

// GET /api/v1/athletes
router.get('/athletes', async (req, res) => {
  try {
    const showAll = req.query.all === '1' || req.query.all === 'true';
    const whereClause = showAll ? '' : 'WHERE a.is_verified = 1';

    const [rows] = await pool.query(`
      SELECT 
        a.id, a.contingent_id, a.sport_id, a.nik, a.full_name, a.gender, 
        a.birth_place, a.birth_date, a.photo_url, 
        a.height_cm, a.weight_kg, a.achievements, a.is_verified,
        c.name AS contingent_name, c.code AS contingent_code,
        s.name AS sport_name
      FROM athletes a
      LEFT JOIN contingents c ON a.contingent_id = c.id
      LEFT JOIN sports s ON a.sport_id = s.id
      ${whereClause}
      ORDER BY a.id DESC
    `);
    res.json({ success: true, count: rows.length, data: rows });
  } catch (error) {
    res.status(500).json({ success: false, error: error.message });
  }
});

// POST /api/v1/athletes
router.post('/athletes', async (req, res) => {
  try {
    const {
      contingent_id,
      sport_id,
      nik,
      full_name,
      gender,
      birth_place,
      birth_date,
      height_cm,
      weight_kg,
      achievements,
      photo_url,
      is_verified,
    } = req.body;

    if (!contingent_id || !sport_id || !nik || !full_name || !gender) {
      return res.status(400).json({
        success: false,
        message: 'Field wajib: contingent_id, sport_id, nik, full_name, gender',
      });
    }

    // Check duplicate NIK
    const [existing] = await pool.query('SELECT id, full_name FROM athletes WHERE nik = ?', [nik]);
    if (existing.length > 0) {
      return res.status(422).json({
        success: false,
        message: `NIK ${nik} sudah terdaftar atas nama ${existing[0].full_name}!`,
      });
    }

    const [result] = await pool.query(
      `INSERT INTO athletes 
       (contingent_id, sport_id, nik, full_name, gender, birth_place, birth_date, height_cm, weight_kg, achievements, photo_url, is_verified, created_at, updated_at) 
       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())`,
      [
        parseInt(contingent_id),
        parseInt(sport_id),
        nik,
        full_name,
        gender,
        birth_place || null,
        birth_date || null,
        height_cm ? parseInt(height_cm) : null,
        weight_kg ? parseInt(weight_kg) : null,
        achievements || null,
        photo_url || '/images/athletes/default.jpg',
        is_verified ? 1 : 0,
      ]
    );

    const [newRow] = await pool.query(
      `SELECT a.*, c.name AS contingent_name, s.name AS sport_name 
       FROM athletes a
       LEFT JOIN contingents c ON a.contingent_id = c.id
       LEFT JOIN sports s ON a.sport_id = s.id
       WHERE a.id = ?`,
      [result.insertId]
    );

    res.status(201).json({
      success: true,
      message: 'Data atlet baru berhasil disimpan ke database!',
      data: newRow[0],
    });
  } catch (error) {
    console.error('Insert athlete error:', error);
    res.status(500).json({ success: false, error: error.message });
  }
});

// GET /api/v1/documents
router.get('/documents', async (req, res) => {
  try {
    const [rows] = await pool.query(`
      SELECT d.*, s.name AS sport_name 
      FROM documents d 
      LEFT JOIN sports s ON d.sport_id = s.id 
      ORDER BY d.id ASC
    `);
    res.json({ success: true, count: rows.length, data: rows });
  } catch (error) {
    res.status(500).json({ success: false, error: error.message });
  }
});

// GET /api/v1/galleries
router.get('/galleries', async (req, res) => {
  try {
    const [rows] = await pool.query(`
      SELECT g.*, s.name AS sport_name 
      FROM galleries g 
      LEFT JOIN sports s ON g.sport_id = s.id 
      ORDER BY g.published_at DESC
    `);
    res.json({ success: true, count: rows.length, data: rows });
  } catch (error) {
    res.status(500).json({ success: false, error: error.message });
  }
});

module.exports = router;
