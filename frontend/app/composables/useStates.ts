export const useStates = () => {
  const toggleLoginRequiredDialog = useState("toggle-login-request-dialog", () => false)
  const toggleLoginDialog = useState("toggle-login-dialog", () => false)

  //PioReport
  const togglePioUploadReportDialog = useState("toggle-pio-upload-report-dialog", () => false)
  const togglePioEditReportDialog = useState("toggle-pio-edit-report-dialog", () => false)
  const togglePioDeleteReportDialog = useState("toggle-pio-delete-report-dialog", () => false)

  //PioNewsAndUpdate
  const togglePioDeleteNewsAndUpdateDialog = useState("toggle-pio-delete-news-update-dialog", () => false)
  const loginDialogShown = useCookie("login-dialog-shown", {
    default: () => false,
    maxAge: 60 * 60 * 24,
  })

  return {
    toggleLoginRequiredDialog,
    toggleLoginDialog,
    loginDialogShown,
    togglePioUploadReportDialog,
    togglePioDeleteReportDialog,
    togglePioEditReportDialog,
  }
}
