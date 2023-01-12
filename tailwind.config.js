/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./Modules/**/Resources/**/*.blade.php",
        "./Modules/**/Resources/**/*.js",
        "./Modules/**/Resources/**/*.vue",
    ],
  theme: {
    extend: {},
  },
  plugins: [],
}
