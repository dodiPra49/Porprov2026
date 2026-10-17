const express = require('express');
const router = express.Router();
const pool = require('../config/db');

// GET /api/v1/news - Daftar Berita Porprov
router.get('/', async (req, res) => {
  const { category, limit = 10, featured } = req.query;

  try {
    let query = `
      SELECT 
        n.id,
        n.title,
        n.slug,
        n.excerpt,
        n.thumbnail_url,
        n.views_count,
        n.is_featured,
        n.published_at,
        c.name AS category_name,
        c.slug AS category_slug,
        u.name AS author_name
      FROM news n
      JOIN news_categories c ON n.category_id = c.id
      LEFT JOIN users u ON n.author_id = u.id
      WHERE n.status = 'published'
    `;
    const params = [];

    if (category) {
      query += ' AND c.slug = ?';
      params.push(category);
    }

    if (featured === 'true' || featured === '1') {
      query += ' AND n.is_featured = 1';
    }

    query += ' ORDER BY n.published_at DESC LIMIT ?';
    params.push(parseInt(limit));

    const [rows] = await pool.query(query, params);

    res.json({
      success: true,
      count: rows.length,
      data: rows,
    });
  } catch (error) {
    res.status(500).json({
      success: false,
      message: 'Gagal memuat daftar berita.',
      error: error.message,
    });
  }
});

// GET /api/v1/news/:slug - Detail Berita
router.get('/:slug', async (req, res) => {
  const { slug } = req.params;

  try {
    const [rows] = await pool.query(
      `
      SELECT 
        n.id,
        n.title,
        n.slug,
        n.excerpt,
        n.content,
        n.thumbnail_url,
        n.views_count,
        n.is_featured,
        n.published_at,
        c.name AS category_name,
        c.slug AS category_slug,
        u.name AS author_name
      FROM news n
      JOIN news_categories c ON n.category_id = c.id
      LEFT JOIN users u ON n.author_id = u.id
      WHERE n.slug = ? AND n.status = 'published'
      LIMIT 1
    `,
      [slug]
    );

    if (rows.length === 0) {
      return res.status(404).json({
        success: false,
        message: 'Berita tidak ditemukan.',
      });
    }

    // Increment views count
    await pool.query('UPDATE news SET views_count = views_count + 1 WHERE slug = ?', [slug]);

    res.json({
      success: true,
      data: rows[0],
    });
  } catch (error) {
    res.status(500).json({
      success: false,
      message: 'Gagal memuat artikel berita.',
      error: error.message,
    });
  }
});

module.exports = router;
