import { type ClassValue, clsx } from 'clsx'
import { twMerge } from 'tailwind-merge'

export function cn(...inputs: ClassValue[]) {
  return twMerge(clsx(inputs))
}

export function formatReportId(id) {
  const idLength = String(id).length
  const zerosNeeded = Math.max(5 - idLength, 0)
  return "0".repeat(zerosNeeded) + id
}