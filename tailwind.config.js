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
          'danger': '#dc3545',
          'light': '#f8f9fa',
          'dark': '#343a40',
          'primary': '#0d6efd',
        }
      },
    },
    plugins: [
        require('flowbite/plugin')
    ],
    darkMode: 'class',
  }
