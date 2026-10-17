const express = require('express');
const cors = require('cors');
require('dotenv').config();

const authRoutes = require('./routes/authRoutes');
const medalsRoutes = require('./routes/medalsRoutes');
const newsRoutes = require('./routes/newsRoutes');
const schedulesRoutes = require('./routes/schedulesRoutes');
const venuesRoutes = require('./routes/venuesRoutes');
const recordsRoutes = require('./routes/recordsRoutes');
const cheersRoutes = require('./routes/cheersRoutes');
const generalRoutes = require('./routes/generalRoutes');

const app = express();
const PORT = process.env.PORT || 5000;

// Middlewares
app.use(cors());
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// Health Check
app.get('/health', (req, res) => {
  res.json({
    status: 'ok',
    service: 'PORPROV 2026 High-Speed Express REST API Engine',
    timestamp: new Date().toISOString(),
  });
});

// Mount Routes under /api/v1
app.use('/api/v1/auth', authRoutes);
app.use('/api/v1/medals', medalsRoutes);
app.use('/api/v1/news', newsRoutes);
app.use('/api/v1/schedules', schedulesRoutes);
app.use('/api/v1/venues', venuesRoutes);
app.use('/api/v1/records', recordsRoutes);
app.use('/api/v1/cheers', cheersRoutes);
app.use('/api/v1', generalRoutes);

// 404 Handler
app.use((req, res) => {
  res.status(404).json({
    success: false,
    message: `Endpoint ${req.originalUrl} tidak ditemukan pada REST API Porprov.`,
  });
});

// Error Handler
app.use((err, req, res, next) => {
  console.error('[API Error]:', err);
  res.status(500).json({
    success: false,
    message: 'Terjadi kesalahan internal server.',
    error: err.message,
  });
});

if (process.env.NODE_ENV !== 'test') {
  app.listen(PORT, () => {
    console.log(`⚡ PORPROV Sumbar 2026 Express REST API Engine berjalan di port ${PORT}`);
    console.log(`🔗 Health Check: http://localhost:${PORT}/health`);
  });
}

module.exports = app;
