interface Officer {
  name: string
  fb_link: string
  position: string
  college: string
  course: string
  bu_email: string
}

interface CitizensCharter {
  title: string
  missions: string[]
  officers: Officer[]
}

interface Csc {
  name: string
  image_url: string
  abbreviation: string
}

interface Csr {
  name: string
  school_year: string
  college: string
}
