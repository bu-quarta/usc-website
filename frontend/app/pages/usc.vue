<script setup lang="ts">
  //officials
  const officials = [
    {
      name: "STACY DANIEL V. ALAMARES",
      position: "Chairperson and Student Regent",
      college: "College of Arts and Letters",
      bu_email: "bu.email@example.com",
    },
    {
      name: "JAMILLE R. BUIZA",
      position: "Internal Vice Chairperson",
      college: "Jesse M. Robreao Institute of Governance and Development",
      bu_email: "bu.email@example.com",
    },
    {
      name: "KC MAXINNE A. MENDONES",
      position: "External Vice Chairperson",
      college: "College of Science",
      bu_email: "bu.email@example.com",
    },
    {
      name: "RANCIA LEI B. BULAWAN",
      position: "Secretary-General",
      college: "College of Business, Economics, and Management",
      bu_email: "bu.email@example.com",
    },
    {
      name: "BEA LYZZAH B. MADRONIO",
      position: "Deputy Secretary-General",
      college: "College of Business, Economics, and Management",
      bu_email: "bu.email@example.com",
    },
    {
      name: "YANCY S. BERMAS",
      position: "Finance Officer",
      college: "College of Engineering",
      bu_email: "bu.email@example.com",
    },
    {
      name: "ZHARISSE S. DE LOS SANTOS",
      position: "Deputy Finance Officer",
      college: "College of Engineering",
      bu_email: "bu.email@example.com",
    },
    {
      name: "ARIANNA KESI A. DIGO",
      position: "Auditor",
      college: "College of Business, Economics, and Management",
      bu_email: "bu.email@example.com",
    },
    {
      name: "IZEL B. MANATA",
      position: "Business Manager",
      college: "College of Arts and Letters",
      bu_email: "bu.email@example.com",
    },
    {
      name: "KYLE REUBEN O. BRON",
      position: "Public Information Officer",
      college: "College of Social Sciences and Philosophy",
      bu_email: "bu.email@example.com",
    },
  ]

  //advisers
  const advisers = [
    {
      name: "DR. OFELIA SAMAR-SY",
      position: "Junior Adviser",
      bu_email: "",
      college: "",
    },
    {
      name: "ENGR. HANA MYKA CATON-DULAY",
      position: "Senior Adviser",
      bu_email: "",
      college: "",
    },
    {
      name: "JAZZLYN IMPERIAL",
      position: "Junior Adviser",
      bu_email: "",
      college: "",
    },
  ]
</script>

<template>
  <div>
    <section id="about_us" class="container px-16 pb-8 flex gap-4">
      <div class="space-y-4">
        <div class="space-y-2">
          <h1 class="text-xl font-bold">About Us</h1>
          <p class="">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla hendrerit ligula in quam sagittis elementum. Curabitur non
            pretium velit. Etiam in lobortis mauris. Nulla ornare mi eu sapien imperdiet, id varius justo fringilla. Nullam vitae lacinia
            libero. Vestibulum in nisi leo. Integer tincidunt, turpis id maximus viverra, lacus augue egestas nibh, non efficitur ligula
            nulla at lectus.
          </p>
          <p>
            Suspendisse pharetra scelerisque leo at luctus. Morbi molestie scelerisque velit vitae rutrum. Cras vitae fermentum ipsum. Ut eu
            velit urna. Mauris congue dui quis tellus iaculis, quis molestie tellus lobortis. Pellentesque mollis libero nec ullamcorper
            laoreet. Suspendisse fringilla rutrum diam in facilisis. Nunc dictum pellentesque diam. Cras magna purus, suscipit at molestie
            at, laoreet sit amet mi. Nunc porttitor rutrum sapien lacinia efficitur. Nullam ac dui nec dolor pellentesque euismod. Nullam
            finibus tristique nibh nec volutpat.
          </p>
        </div>

        <div class="space-y-2">
          <p class="font-medium">OUR VISION</p>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla hendrerit ligula in quam sagittis elementum. Curabitur non
            pretium velit. Etiam in lobortis mauris.
          </p>
        </div>
      </div>

      <div class="aspect-square w-[1500px] flex items-center justify-center">
        <NuxtImg src="/images/usc-logo.jpg" class="w-full" />
      </div>
    </section>

    <section id="official-directory" class="container px-16 py-8">
      <div class="text-center">
        <div class="grid grid-cols-[1fr_auto_1fr] items-center gap-2">
          <Separator />
          <p class="text-lg font-medium">OFFICIAL DIRECTORY</p>
          <Separator />
        </div>
        <p class="text-xs font-light">ACADEMIC YEAR 2024-2025</p>
      </div>

      <div class="flex gap-4 mt-8">
        <div class="p-1 grid grid-cols-4 gap-4 px-8">
          <template v-for="official in officials" :key="official">
            <Card class="border-none">
              <CardContent class="items-center justify-center space-y-2 p-0">
                <div class="w-full">
                  <Skeleton
                    class="rounded-md aspect-[4/5] w-full bg-[radial-gradient(circle,rgba(255,171,0,1)_0%,rgba(0,153,203,1)_100%)]"
                  />
                </div>
                <div class="text-xs space-y-2 select-none text-center">
                  <div>
                    <p class="uppercase font-medium text-sm">{{ official.name }}</p>
                    <p class="font-light">{{ official.position }}</p>
                  </div>
                  <p class="text-[#555555] font-light">{{ official.college }}</p>
                  <p class="text-[#555555] font-light flex items-center gap-1 justify-center">
                    <Icon name="ic:baseline-email" /> {{ official.bu_email }}
                  </p>
                </div>
              </CardContent>
            </Card>
          </template>
        </div>
      </div>
    </section>

    <section id="official_directory_advisers" class="container px-16 py-8">
      <Separator class="mb-16" />

      <div class="p-1 grid grid-cols-4 gap-4 px-8">
        <template v-for="adviser in advisers" :key="adviser">
          <Card class="border-none">
            <CardContent class="items-center justify-center space-y-2 p-0">
              <div class="w-full">
                <Skeleton class="rounded-md aspect-[4/5] w-full bg-[radial-gradient(circle,rgba(255,171,0,1)_0%,rgba(0,153,203,1)_100%)]" />
              </div>
              <div class="text-xs space-y-2 select-none text-center">
                <div>
                  <p class="uppercase font-medium text-sm">{{ adviser.name }}</p>
                  <p class="font-light">{{ adviser.position }}</p>
                </div>
              </div>
            </CardContent>
          </Card>
        </template>
      </div>
    </section>
  </div>
</template>

<style scoped></style>
