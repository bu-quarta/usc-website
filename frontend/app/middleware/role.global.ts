export default defineNuxtRouteMiddleware((to, from) => {
  const user = useCurrentUser<User>()
  const role = user?.value?.roles?.[0]

  if (to.path.includes("management/pio")) {
    if (role !== "pio") {
      return abortNavigation()
    }

    return
  }
})
