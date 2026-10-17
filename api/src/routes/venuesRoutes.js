const express = require('express');
const router = express.Router();
const pool = require('../config/db');

// GET /api/v1/venues - Lokasi Venue Pertandingan (GIS Map)
router.get('/', async (req, res) => {
  try {
    const [rows] = await pool.query(`
      SELECT 
        v.id,
        v.name,
        v.slug,
        v.city,
        v.address,
        v.latitude,
        v.longitude,
        v.capacity,
        v.contact_person,
        v.google_map_url,
        v.image_url,
        COUNT(s.id) AS total_schedules
      FROM venues v
      LEFT JOIN schedules s ON v.id = s.venue_id
      GROUP BY v.id
      ORDER BY v.city ASC, v.name ASC
    `);

    res.json({
      success: true,
      count: rows.length,
      data: rows,
    });
  } catch (error) {
    res.status(500).json({
      success: false,
      message: 'Gagal memuat daftar venue pertandingan.',
      error: error.message,
    });
  }
});

module.exports = router;
