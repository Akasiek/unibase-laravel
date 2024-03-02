import { Subject } from "@/Models/Subject";

export interface Lecture {
  id: number;
  date: Date;
  summary?: string;
  subject_id: number;
  notion_link?: string;
  subject: Subject;
  videos: {
    id: number;
    youtube_link: string;
  }[];
}
