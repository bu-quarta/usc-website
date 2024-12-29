export const useStates = () => {
  const toggleLoginDialog = useState("toggle-login-dialog", () => false)
  const loginDialogShown = useCookie("login-dialog-shown", {
    default: () => false,
    maxAge: 60 * 60 * 24,
  })

  return {
    toggleLoginDialog,
    loginDialogShown,
  }
}
