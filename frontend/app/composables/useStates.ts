export const useStates = () => {
  const toggleLoginRequiredDialog = useState("toggle-login-request-dialog", () => false)
  const toggleLoginDialog = useState("toggle-login-dialog", () => false)
  const loginDialogShown = useCookie("login-dialog-shown", {
    default: () => false,
    maxAge: 60 * 60 * 24,
  })

  return {
    toggleLoginRequiredDialog,
    toggleLoginDialog,
    loginDialogShown,
  }
}
