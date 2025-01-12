export const useStates = () => {
  const toggleLoginRequiredDialog = useState("toggle-login-request-dialog", () => false)
  const toggleLoginDialog = useState("toggle-login-dialog", () => false)

  //PioReport
  const togglePioUploadReportDialog = useState("toggle-pio-upload-report-dialog", () => false)
  const togglePioEditReportDialog = useState("toggle-pio-edit-report-dialog", () => false)
  const togglePioDeleteReportDialog = useState("toggle-pio-delete-report-dialog", () => false)

  //PioNewsAndUpdate
  const togglePioDeleteNewsAndUpdateDialog = useState("toggle-pio-delete-news-update-dialog", () => false)
  const togglePioUploadNewsAndUpdateDialog = useState("toggle-pio-upload-news-update-dialog", () => false)
  const togglePioEditNewsAndUpdateDialog = useState("toggle-pio-edit-news-update-dialog", () => false)

  //Event
  const togglePioUploadEventDialog = useState("toggle-pio-upload-event-dialog", () => false)
  const togglePioEditEventDialog = useState("toggle-pio-edit-event-dialog", () => false)
  const togglePioDeleteEventDialog = useState("toggle-pio-delete-event-dialog", () => false)

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
    togglePioDeleteNewsAndUpdateDialog,
    togglePioUploadNewsAndUpdateDialog,
    togglePioEditNewsAndUpdateDialog,
    togglePioUploadEventDialog,
    togglePioEditEventDialog,
    togglePioDeleteEventDialog,
  }
}
