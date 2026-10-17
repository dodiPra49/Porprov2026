const express = require('express');
const router = express.Router();
const pool = require('../config/db');

// GET /api/v1/medals - Klasemen Medali Real-time
router.get('/', async (req, res) => {
  try {
    const [rows] = await pool.query(`
      SELECT 
        m.id,
        m.contingent_id,
        c.name AS contingent_name,
        c.code AS contingent_code,
        c.logo_url,
        c.color_hex,
        c.target_gold,
        m.gold,
        m.silver,
        m.bronze,
        m.total_medals,
        m.rank_position,
        m.last_updated_at
      FROM medal_tallies m
      JOIN contingents c ON m.contingent_id = c.id
      ORDER BY m.gold DESC, m.silver DESC, m.bronze DESC, m.total_medals DESC
    `);

    // Tambahkan dynamic ranking index
    const dataWithRank = rows.map((item, index) => ({
      ...item,
      rank: index + 1,
    }));

    // Hitung total medali yang telah diperebutkan
    const summary = rows.reduce(
      (acc, curr) => {
        acc.total_gold += curr.gold;
        acc.total_silver += curr.silver;
        acc.total_bronze += curr.bronze;
        acc.grand_total += curr.total_medals;
        return acc;
      },
      { total_gold: 0, total_silver: 0, total_bronze: 0, grand_total: 0 }
    );

    res.json({
      success: true,
      timestamp: new Date().toISOString(),
      summary,
      data: dataWithRank,
    });
  } catch (error) {
    res.status(500).json({
      success: false,
      message: 'Gagal mengambil data klasemen medali.',
      error: error.message,
    });
  }
});

module.exports = router;
