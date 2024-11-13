/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    container: {
      center: true,
      padding: "15px",
    },
    screens: {
      sm: "640px",
      md: "768px",
      lg: "960px",
      xl: "1280px",
    },
    fontFamily: {
      pattaya: ["Pattaya", "sans-serif"],
    },
    extend: {
      colors: {
        primary: "#1c1c22",
        accent: {
          DEFAULT: "#F2B518",
          hover: "#E6AE1D",
        },
        dark: {
          DEFAULT: "#152238",
          hover: "#23395d",
        },
        light: {
          DEFAULT: "#1c1c22",
          hover: "#1c1c22",
        },
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

