const jwt = require('jsonwebtoken');

const JWT_SECRET = process.env.JWT_SECRET || 'PorprovSumbar2026SuperSecretKeyJWTTokenSecurity!';

const authenticateJWT = (req, res, next) => {
  const authHeader = req.headers.authorization;

  if (!authHeader || !authHeader.startsWith('Bearer ')) {
    return res.status(401).json({
      success: false,
      message: 'Akses ditolak. Token autentikasi JWT wajib disertakan.',
    });
  }

  const token = authHeader.split(' ')[1];

  try {
    const decoded = jwt.verify(token, JWT_SECRET);
    req.user = decoded;
    next();
  } catch (error) {
    return res.status(403).json({
      success: false,
      message: 'Token JWT tidak valid atau telah kedaluwarsa.',
      error: error.message,
    });
  }
};

module.exports = {
  authenticateJWT,
  JWT_SECRET,
};
