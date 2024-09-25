/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
      extend: {
        colors: {
          'grey': '#64748b',
          'black': '#000',
          'warning': '#ffc107',
          'success': '#28a745',
          'secondary': '#6c757d',
        }
      },
    },
    plugins: [
        require('flowbite/plugin')
    ],
    darkMode: 'class',
  }
