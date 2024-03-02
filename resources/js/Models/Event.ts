import { Subject } from "@/Models/Subject";
import { EventType } from "@/Models/EventType";

export interface Event {
  id: number;
  name: string;
  date?: Date;
  info?: string;
  event_type_id: number;
  subject_id?: number;
  subject?: Subject;
  event_type: EventType;
}
