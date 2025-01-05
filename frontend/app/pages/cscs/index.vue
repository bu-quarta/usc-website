<script setup lang="ts">
  const cscs: Csc[] = [
    {
      name: "College of Science",
      image_url: "/images/csc/cs",
      abbreviation: "cs",
    },
    {
      name: "College of Nursing",
      image_url: "/images/csc/cn",
      abbreviation: "cn",
    },
    {
      name: "College of Arts and Letters",
      image_url: "/images/csc/cal",
      abbreviation: "cal",
    },
    {
      name: "Jesse M. Robredo Institute Of Governance and Development",
      image_url: "/images/csc/jmrigd",
      abbreviation: "jmrigd",
    },
    {
      name: "College of Business, Economics, and Management",
      image_url: "/images/csc/cbem",
      abbreviation: "cbem",
    },
    {
      name: "Institute of Physical Education Sports and Recreation",
      image_url: "/images/csc/ipesr",
      abbreviation: "ipesr",
    },
    {
      name: "College of Social Sciences and Philosophy",
      image_url: "/images/csc/cssp",
      abbreviation: "cssp",
    },
    {
      name: "College of Education",
      image_url: "/images/csc/ced",
      abbreviation: "ced",
    },
    {
      name: "College Of Engineering",
      image_url: "/images/csc/ce",
      abbreviation: "ce",
    },
    {
      name: "Institute Of Design and Architecture",
      image_url: "/images/csc/ida",
      abbreviation: "ida",
    },
    {
      name: "College of Law",
      image_url: "/images/csc/cl",
      abbreviation: "cl",
    },
    {
      name: "College of Medicine",
      image_url: "/images/csc/cm",
      abbreviation: "cm",
    },
  ]
</script>

<template>
  <div class="font-light container px-16">
    <section id="intro" class="pb-8 space-y-2">
      <p class="font-bold text-xl">College Student Councils (CSCs)</p>
      <p class="grid grid-cols-2">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla hendrerit ligula in quam sagittis elementum. Curabitur non pretium
        velit. Etiam in lobortis mauris. Nulla ornare mi eu sapien imperdiet, id varius justo fringilla. Nullam vitae lacinia libero.
        Vestibulum in nisi leo.
      </p>
    </section>

    <section id="content" class="py-8 container px-16 grid grid-cols-4 gap-4">
      <template v-for="csc in cscs">
        <NuxtLink :to="`/cscs/${csc.abbreviation}`">
          <Card class="border-none">
            <CardContent class="items-center justify-center space-y-2 p-0">
              <div class="w-full">
                <div
                  class="flex items-center justify-center rounded-md aspect-[4/5] w-full bg-[linear-gradient(220deg,rgba(234,167,51,1)_0%,rgba(0,153,203,1)_100%)]"
                >
                  <!-- <div class="w-3/4">
                        <AspectRatio>
                          <NuxtImg :src="csc.image_url" class="rounded-full" />
                        </AspectRatio>
                      </div> -->

                  <Skeleton class="rounded-full aspect-square w-3/4" />
                </div>
              </div>
              <div class="text-xs space-y-2 select-none text-center">
                <p class="font-medium text-sm">{{ csc.name }}</p>
              </div>
            </CardContent>
          </Card>
        </NuxtLink>
      </template>
    </section>
  </div>
</template>

<style scoped></style>
