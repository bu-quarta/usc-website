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

interface Dev {
  name: string
  position: string
  college: string
}

interface Report {
  id: number
  type: string
  title: string
  date_time: string
  file_url: string
  status?: string
}

interface User {
  name: string
  email: string
  roles: string[]
}

interface NewsUpdate {
  id: number
  title: string
  slug: string
  description: string
  published_date: stringW
  image_url: string
  status: string
  date_time: string
}

interface EventPost {
  id: number
  title: string
  slug: string
  description: string
  date_time: string
  location: string
  image_url: string
  status: string
  date_posted: string
  date_time_posted: string
}

interface EventPostDetail {
  event_post: EventPost
  previous_event: {
    slug: string
    title: string
  }
  next_event: {
    slug: string
    title: string
  }
  other_events: EventPost[]
}

interface NewsUpdateDetail {
  news_update: NewsUpdate
  other_news_updates: NewsUpdate[]
}
