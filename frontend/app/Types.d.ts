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

interface Csr {
  name: string
  type: string
  college: string
  year_range: string
}

interface Dev {
  name: string
  position: string
  college: string
  image_url: string
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
  avatar: string
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

interface Comment {
  id: number
  user?: User
  content: string
  likes: number
  dislikes: number
  created_at: string
  created_at_iso: string
}

interface EventPostDetail {
  event_post: EventPost
  comments: Comment[]
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
  comments: Comment[]
  other_news_updates: NewsUpdate[]
}

interface UscOfficial {
  id: number
  name: string
  college: string
  position: string
  email: string
  image_url: string
}

interface UscAdviser {
  id: number
  name: string
  position: string
  type: string
  image_url: string
}

interface CscDirectory {
  name: string
  abbr: string
  slug: string
  image_url: string
}

interface CscOfficial {
  id: number
  name: string
  position: string
  email: string
}

interface Faq {
  id: number
  question: string
  answer: string
}
