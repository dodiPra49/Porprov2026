/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/pages/**/*.{js,ts,jsx,tsx,mdx}",
    "./src/components/**/*.{js,ts,jsx,tsx,mdx}",
    "./src/app/**/*.{js,ts,jsx,tsx,mdx}",
  ],
  theme: {
    extend: {
      colors: {
        marawa: {
          red: '#BE123C',
          gold: '#F59E0B',
          amber: '#D97706',
          dark: '#0F172A',
        },
      },
    },
  },
  plugins: [],
};
