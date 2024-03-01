interface Lecture {
  id: number;
  date: Date;
  summary?: string;
  subject_id: number;
  notion_link?: string;
  subject: {
    id: number;
    name: string;
  };
  videos: {
    id: number;
    youtube_link: string;
  }[];
}
