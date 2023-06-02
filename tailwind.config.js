module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {},
    colors: {
      'main': '#FF9F15',
      'second': '#ffeee5',
      'line':'#484848',
    },
  },
  plugins: [
      require('flowbite/plugin')
  ],
}