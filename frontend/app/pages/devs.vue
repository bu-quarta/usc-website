<script setup lang="ts">
  const devs: Dev[] = [
    {
      name: "Hazel Anne B. Marqueses",
      position: "Project Manager",
      college: "BS Information Technology, BUCS",
    },
    {
      name: "Trina Chariz B. Hibo",
      position: "Systems Analyst",
      college: "BS Information Technology, BUCS",
    },
    {
      name: "Misty Shaine S. Niones",
      position: "UI/UX Designer",
      college: "BS Information Technology, BUCS",
    },
    {
      name: "Jeddy C. Certifico",
      position: "Full-Stack Developer",
      college: "BS Information Technology, BUCS",
    },
    {
      name: "Alvin S. Nario",
      position: "Backend Developer",
      college: "BS Information Technology, BUCS",
    },
    {
      name: "Eljohn Paulo C. Loterte",
      position: "UI/UX Designer",
      college: "BS Information Technology, BUCS",
    },
  ]
</script>

<template>
  <div class="font-light container px-16">
    <section id="intro" class="pb-8 space-y-2">
      <p class="font-bold text-xl">Meet the Developers</p>
      <p class="grid grid-cols-2">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla hendrerit ligula in quam sagittis elementum. Curabitur non pretium
        velit. Etiam in lobortis mauris. Nulla ornare mi eu sapien imperdiet, id varius justo fringilla. Nullam vitae lacinia libero.
        Vestibulum in nisi leo. Integer tincidunt, turpis id maximus viverra, lacus augue egestas nibh, non efficitur ligula nulla at
        lectus.
      </p>
    </section>

    <section>
      <div class="p-1 grid grid-cols-3 gap-8 px-44">
        <template v-for="dev in devs" :key="dev">
          <Card class="border-none">
            <CardContent class="items-center justify-center space-y-2 p-0">
              <div class="w-full">
                <Skeleton class="rounded-md aspect-[4/5] w-full bg-[radial-gradient(circle,rgba(255,171,0,1)_0%,rgba(0,153,203,1)_100%)]" />
              </div>
              <div class="text-xs space-y-2 select-none text-center">
                <div>
                  <p class="uppercase font-medium text-sm">{{ dev.name }}</p>
                  <p class="font-light">{{ dev.position }}</p>
                </div>
                <p class="text-[#555555] font-light">{{ dev.college }}</p>
              </div>
            </CardContent>
          </Card>
        </template>
      </div>
    </section>
  </div>
</template>

<style scoped></style>
