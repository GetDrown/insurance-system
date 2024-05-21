/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./*.{html,js,php}", "./src/**/*.{html,js,php}"],
    theme: {
        extend: {
            fontFamily: {
                'poppins': ['Poppins', 'sans-serif'],
                'inter': ['Inter', 'sans-serif']
            }
        },
    },
    plugins: [],
};