const express = require('express');
const router = express.Router();
const pool = require('../config/db');

// GET /api/v1/records - Rekor Baru Porprov (Record Breakers)
router.get('/', async (req, res) => {
  try {
    const [rows] = await pool.query(`
      SELECT 
        pr.id,
        pr.record_metric,
        pr.previous_record,
        pr.new_record,
        pr.achieved_at,
        pr.venue_name,
        pr.notes,
        ath.full_name AS athlete_name,
        con.name AS contingent_name,
        con.code AS contingent_code,
        sub.name AS sub_sport_name,
        sp.name AS sport_name
      FROM porprov_records pr
      JOIN athletes ath ON pr.athlete_id = ath.id
      JOIN contingents con ON pr.contingent_id = con.id
      JOIN sub_sports sub ON pr.sub_sport_id = sub.id
      JOIN sports sp ON sub.sport_id = sp.id
      ORDER BY pr.achieved_at DESC
    `);

    res.json({
      success: true,
      count: rows.length,
      data: rows,
    });
  } catch (error) {
    res.status(500).json({
      success: false,
      message: 'Gagal memuat rekor baru Porprov.',
      error: error.message,
    });
  }
});

module.exports = router;
