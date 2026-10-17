const express = require('express');
const router = express.Router();
const pool = require('../config/db');

// GET /api/v1/schedules - Jadwal dan Hasil Pertandingan
router.get('/', async (req, res) => {
  const { status, sport } = req.query;

  try {
    let query = `
      SELECT 
        s.id,
        s.match_code,
        s.round_name,
        s.scheduled_at,
        s.finished_at,
        s.status,
        s.notes,
        sub.name AS sub_sport_name,
        sub.gender_category,
        sp.name AS sport_name,
        sp.slug AS sport_slug,
        v.name AS venue_name,
        v.city AS venue_city,
        mr.score_summary,
        mr.score_detail,
        ath.full_name AS winner_name,
        con.name AS winner_contingent
      FROM schedules s
      JOIN sub_sports sub ON s.sub_sport_id = sub.id
      JOIN sports sp ON sub.sport_id = sp.id
      JOIN venues v ON s.venue_id = v.id
      LEFT JOIN match_results mr ON s.id = mr.schedule_id
      LEFT JOIN athletes ath ON mr.winner_athlete_id = ath.id
      LEFT JOIN contingents con ON mr.winner_contingent_id = con.id
      WHERE 1=1
    `;
    const params = [];

    if (status) {
      query += ' AND s.status = ?';
      params.push(status);
    }

    if (sport) {
      query += ' AND sp.slug = ?';
      params.push(sport);
    }

    query += ' ORDER BY s.scheduled_at ASC';

    const [rows] = await pool.query(query, params);

    res.json({
      success: true,
      count: rows.length,
      data: rows,
    });
  } catch (error) {
    res.status(500).json({
      success: false,
      message: 'Gagal memuat jadwal pertandingan.',
      error: error.message,
    });
  }
});

module.exports = router;
