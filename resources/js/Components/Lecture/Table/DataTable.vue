<script setup lang="ts">
import { usePage } from "@inertiajs/vue3";
import { ColumnDef } from "@tanstack/vue-table";
import { h, onMounted, ref } from "vue";
import { Button } from "@/Components/ui/button";
import { ArrowUpDown, FileVideoIcon } from "lucide-vue-next";
import { LectureUpdateForm } from "@/Components/Lecture/Form";
import { LectureDeleteDialog } from "@/Components/Lecture/Delete";
import { DataTable } from "@/Components/ui/table";
import SubjectSelect from "@/Components/Lecture/Table/SubjectSelect.vue";
import { Badge } from "@/Components/ui/badge";

const page = usePage();
const { lectures, subjects } = defineProps<{
  lectures: Lecture[];
  subjects: Subject[];
}>();

const columns: ColumnDef<Lecture>[] = [
  {
    accessorKey: "date",
    header: ({ column }) =>
      h(
        Button,
        {
          variant: "ghost",
          onClick: () => column.toggleSorting(column.getIsSorted() === "asc"),
          class: "-ml-4",
        },
        () => ["Data", h(ArrowUpDown, { class: "ml-2 h-4 w-4" })],
      ),
    cell: (props) => new Date(props.row.original.date).toLocaleDateString(),
    enableSorting: true,
  },
  {
    accessorKey: "summary",
    header: "Podsumowanie",
    cell: (props) => props.row.original.summary,
  },
  {
    accessorKey: "subject.name",
    header: ({ column }) =>
      h(
        Button,
        {
          variant: "ghost",
          onClick: () => column.toggleSorting(column.getIsSorted() === "asc"),
          class: "-ml-4",
        },
        () => ["Przedmiot", h(ArrowUpDown, { class: "ml-2 h-4 w-4" })],
      ),
    cell: (props) =>
      props.row.original.subject.color
        ? h(
            Badge,
            {
              style: { backgroundColor: props.row.original.subject.color },
            },
            props.row.original.subject.name,
          )
        : props.row.original.subject.name,
  },
  {
    accessorKey: "notion_link",
    header: "Notion",
    cell: (props) =>
      props.row.original.notion_link
        ? h(
            "a",
            {
              href: props.row.original.notion_link,
              target: "_blank",
              class:
                "underline transition-colors duration-200 hover:text-blue-500",
            },
            "Notion",
          )
        : " - ",
  },
  {
    id: "videos",
    header: "Filmy",
    cell: (props) =>
      h(
        "div",
        { class: "h-full flex flex-wrap gap-5" },
        props.row.original.videos.map((video, index) =>
          h(
            "a",
            {
              href: video.youtube_link,
              target: "_blank",
              class: "relative",
            },
            [
              h(FileVideoIcon, { class: "w-7 h-7" }),
              props.row.original.videos.length > 1
                ? h(
                    "span",
                    {
                      class:
                        "absolute -bottom-1.5 -left-1.5 flex items-center justify-center font-black bg-white text-zinc-950 rounded-md w-4 h-4 text-xs",
                    },
                    index + 1,
                  )
                : null,
            ],
          ),
        ),
      ),
  },
  {
    id: "actions",
    header: "Akcje",
    cell: (props) =>
      h(
        "div",
        { class: "space-x-2" },
        h(LectureUpdateForm, {
          lecture: props.row.original,
          subjects: subjects,
        }),
        h(LectureDeleteDialog, { lectureId: props.row.original.id }),
      ),
  },
];

const guestColumns: ColumnDef<Lecture>[] = columns.filter(
  (column) => column.id !== "actions",
);

const data = ref<Lecture[]>([]);

onMounted(() => {
  data.value = lectures;
});
</script>

<template>
  <DataTable
    :data="lectures"
    :columns="$page.props.auth.user ? columns : guestColumns"
  >
    <template #header="{ table }">
      <div class="flex items-center py-4">
        <div class="w-64">
          <SubjectSelect :subjects="subjects" :table="table" />
        </div>
      </div>
    </template>
  </DataTable>
</template>

<style scoped></style>
