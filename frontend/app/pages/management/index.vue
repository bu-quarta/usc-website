<script setup lang="ts">
  import CardContent from "~/components/ui/card/CardContent.vue"

  definePageMeta({
    layout: "auth",
  })

  const profiles = ref([
    {
      name: "Admin",
      color: "#463ED080",
    },
    {
      name: "USC P.I.O",
      color: "#A43DD080",
    },
    {
      name: "USC IVC",
      color: "#D0C93D80",
    },
    {
      name: "USC Auditor",
      color: "#11111180",
    },
  ])

  const routeDic: { [key: string]: string } = {
    admin: "admin",
    "usc p.i.o": "pio",
    "usc ivc": "ivc",
    "usc auditor": "auditor",
  }

  const navigate = async (path: string) => {
    return navigateTo(`/management/${routeDic[path.toLowerCase()]}`)
  }
</script>

<template>
  <div class="container px-52 flex items-center justify-center h-screen">
    <div class="grid grid-cols-4 gap-4 h-40 shrink-0">
      <template v-for="profile in profiles" :key="profile">
        <Card
          :class="`border-none hover:ring hover:ring-primary cursor-pointer shadow-sm aspect-square relative`"
          :style="`background-color: ${profile.color}; box-shadow: 0 0 10px ${profile.color};`"
          @click="navigate(`${profile.name}`)"
        >
          <CardContent class="p-0">
            <div class="flex gap-5 justify-end mt-8 mr-5">
              <div class="size-10 bg-white rounded-full" />
              <div class="size-10 bg-white rounded-full" />
            </div>
            <div class="rotate-90 w-max ml-[95px] -mt-2 text-white font-light select-none">)</div>
            <h5 class="absolute -bottom-6 left-1/2 transform -translate-x-1/2 font-bold select-none">
              {{ profile.name }}
            </h5>
          </CardContent>
        </Card>
      </template>
    </div>
  </div>
</template>

<style scoped>
  * {
    font-family: Roboto;
  }
</style>
