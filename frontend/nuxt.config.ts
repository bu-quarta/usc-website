// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  compatibilityDate: "2024-11-01",
  devtools: { enabled: true },

  future: {
    compatibilityVersion: 4,
  },

  components: [{ path: "@/components", extensions: [".vue"], pathPrefix: false }],

  modules: [
    "@qirolab/nuxt-sanctum-authentication",
    "@nuxtjs/tailwindcss",
    "shadcn-nuxt",
    "@nuxtjs/color-mode",
    "@nuxt/icon",
    "@nuxt/fonts",
    "@nuxt/image",
    "@stefanobartoletti/nuxt-social-share",
  ],

  routeRules: {
    "/api/**": {
      proxy: "http://localhost:8000/api/**",
    },
  },

  laravelSanctum: {
    apiUrl: import.meta.env.NUXT_PUBLIC_LARAVEL_SANCTUM_API_URL,
  },

  shadcn: {
    /**
     * Prefix for all the imported component
     */
    prefix: "",
    /**
     * Directory that the component lives in.
     * @default "./components/ui"
     */
    componentDir: "./app/components/ui",
  },
  colorMode: {
    classSuffix: "",
    preference: "light",
  },
  socialShare: {
    baseUrl: import.meta.env.NUXT_PUBLIC_SOCIAL_SHARE_URL || "http://localhost:3000",
  },
})
