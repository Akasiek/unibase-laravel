<script setup lang="ts">
import { FileVideoIcon } from "lucide-vue-next";
import { TableBody, TableCell, TableRow } from "@/Components/ui/table";
import { LectureUpdateForm } from "@/Components/Lecture/Form";
import { LectureDeleteDialog } from "@/Components/Lecture/Delete";

defineProps<{
  lectures: Lecture[];
  subjects: Subject[];
}>();
</script>

<template>
  <TableBody>
    <TableRow v-for="lecture in lectures" :key="lecture.id">
      <TableCell class="font-medium">
        {{ new Date(lecture.date).toLocaleDateString() }}
      </TableCell>

      <TableCell> {{ lecture.subject.name }} </TableCell>

      <TableCell> {{ lecture.summary || "-" }} </TableCell>

      <TableCell>
        <a
          v-if="lecture.notion_link"
          :href="lecture.notion_link"
          target="_blank"
          class="underline transition-colors duration-200 hover:text-blue-500"
        >
          Notion
        </a>
        <span v-else> - </span>
      </TableCell>

      <TableCell>
        <div class="h-full flex flex-wrap gap-5 items-center justify-center">
          <div
            v-for="(video, index) in lecture.videos"
            :key="video.id"
            class="h-full"
          >
            <a :href="video.youtube_link" target="_blank" class="relative">
              <FileVideoIcon class="w-7 h-7" />
              <span
                v-if="lecture.videos.length > 1"
                class="absolute -bottom-1.5 -left-1.5 flex items-center justify-center font-black bg-white text-zinc-950 rounded-md w-4 h-4 text-xs"
              >
                {{ index + 1 }}
              </span>
            </a>
          </div>
        </div>
      </TableCell>

      <TableCell class="space-x-2">
        <LectureUpdateForm :lecture="lecture" :subjects="subjects" />
        <LectureDeleteDialog :lecture-id="lecture.id" />
      </TableCell>
    </TableRow>
  </TableBody>
</template>
