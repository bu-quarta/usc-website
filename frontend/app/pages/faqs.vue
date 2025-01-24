<script setup lang="ts">
  const { data } = await useAsyncData<Faq[]>("faqs", () => useSanctumFetch("/api/faqs"))
</script>

<template>
  <div>
    <section id="faqs" class="pb-8 container px-16">
      <p class="text-xl font-bold">Frequently Asked Questions</p>

      <div class="grid grid-cols-2 gap-x-16">
        <template v-for="faq in data" :key="faq">
          <Accordion type="single" collapsible>
            <AccordionItem value="item-1">
              <AccordionTrigger class="font-semibold text-left gap-2 leading-tight">
                <h4>
                  {{ faq.question }}
                </h4>
              </AccordionTrigger>
              <AccordionContent class="text-sm font-light">
                {{ faq.answer }}
              </AccordionContent>
            </AccordionItem>
          </Accordion>
        </template>
      </div>
    </section>
  </div>
</template>

<style scoped></style>
