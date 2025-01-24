<script setup lang="ts"></script>

<template>
  <section class="text-primary-foreground text-xs pt-8">
    <div class="bg-[#333333] container px-16 py-8 grid grid-cols-7 gap-4">
      <div id="intro" class="space-y-2 col-span-2">
        <div>
          <p>BICOL UNIVERSITY</p>
          <p class="font-bold text-sm">UNIVERSITY STUDENT COUNCIL</p>
        </div>
        <div class="space-y-1">
          <p class="flex items-start gap-1">
            <Icon name="mdi:location" /> <span>Bicol University Main Campus, Rizal St, Legazpi, Philippines</span>
          </p>
          <p class="flex items-center gap-1"><Icon name="ic:baseline-email" /> <span>bu-usc@bicol-u.edu.ph</span></p>
        </div>
      </div>

      <div id="logos" class="flex justify-center col-span-2">
        <div class="aspect-square">
          <AspectRatio class="place-content-center">
            <NuxtImg src="/images/bu-logo.png" class="w-3/4" />
          </AspectRatio>
        </div>
        <div class="aspect-square">
          <AspectRatio class="place-content-center">
            <NuxtImg src="/images/usc-logo.png" class="w-full" />
          </AspectRatio>
        </div>
      </div>

      <div id="quick_links" class="flex flex-col gap-2">
        <p class="uppercase font-medium">Quick Links</p>
        <NuxtLink to="/usc#official-directory">Directory</NuxtLink>
        <NuxtLink to="/cscs">College Student Councils</NuxtLink>
        <NuxtLink to="/reports">Reports</NuxtLink>
        <NuxtLink to="/document-tracking">Track My Document</NuxtLink>
      </div>

      <div id="visitors" class="flex flex-col gap-2">
        <p class="uppercase font-medium">visitors</p>
        <NuxtLink to="">
          <p class="flex justify-between">
            <span>Today</span>
            <span class="text-[#FFA200]">0 000</span>
          </p>
        </NuxtLink>
        <NuxtLink to="">
          <p class="flex justify-between">
            <span>This Week </span>
            <span class="text-[#0099CB]">0 000</span>
          </p>
        </NuxtLink>
        <NuxtLink to="">
          <p class="flex justify-between">
            <span>This Month</span>
            <span class="text-[#EA3333]">0 000</span>
          </p>
        </NuxtLink>
        <NuxtLink to="">
          <p class="flex justify-between">
            <span>Total</span>
            <span>0 000</span>
          </p>
        </NuxtLink>
      </div>

      <div id="socials" class="space-y-2 text-center">
        <p class="font-medium">Connect with us!</p>
        <div class="space-x-2">
          <Icon name="mingcute:facebook-fill" size="30" />
          <Icon name="uil:instagram" size="30" />
          <Icon name="ic:baseline-tiktok" size="30" />
        </div>
      </div>
    </div>

    <div class="bg-[#1d1d1d] flex justify-between px-16 py-4">
      <p>Copyright @ 2024. All Rights Reserved.</p>
      <p>Privacy Policy</p>
    </div>
  </section>
</template>

<style scoped></style>
