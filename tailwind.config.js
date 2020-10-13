const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
        },
        customForms: theme => ({
            default: {
              select: {
                borderRadius: theme('borderRadius.none'),
                boxShadow: theme('boxShadow.none'),
                borderColor: theme('borderColor.transparent'),
                iconColor: defaultTheme.colors.gray[900],
               
                icon: iconColor => `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 10l4 4H8z"/></svg>
              `,
              }, 
            },
          })
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },
    future: {
        removeDeprecatedGapUtilities: true,
        purgeLayersByDefault: true,
        defaultLineHeights: true,
        standardFontWeights: true,
    },
    experimental: {
    },
    plugins: [
        require('@tailwindcss/custom-forms'),
    ],
};
