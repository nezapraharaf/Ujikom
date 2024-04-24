/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        primary: "#a1887f",
        secondary: "#3f6212",
        bg: "#bcaaa4",
        text: "#000",
        text_secondary: "#475569",
      },
    },
  },
  plugins: [],
};
