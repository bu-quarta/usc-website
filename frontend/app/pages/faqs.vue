<script setup lang="ts"></script>

<template>
  <div>
    <section id="faqs" class="pb-8 container px-16">
      <p class="text-xl font-bold">Frequently Asked Questions</p>

      <div class="grid grid-cols-2 gap-16">
        <div>
          <template v-for="i in 3" :key="i">
            <Accordion type="single" collapsible>
              <AccordionItem value="item-1">
                <AccordionTrigger class="font-semibold text-left gap-1">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla hendrerit ligula in quam sagittis elementum. Curabitur non
                  pretium velit?
                </AccordionTrigger>
                <AccordionContent class="text-xs font-light">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla hendrerit ligula in quam sagittis elementum. Curabitur non
                  pretium velit. Etiam in lobortis mauris. Nulla ornare mi eu sapien imperdiet, id varius justo fringilla. Nullam vitae
                  lacinia libero. Vestibulum in nisi leo. Integer tincidunt, turpis id maximus viverra, lacus augue egestas nibh, non
                  efficitur ligula nulla at lectus.
                </AccordionContent>
              </AccordionItem>
            </Accordion>
          </template>
        </div>
        <div>
          <template v-for="i in 3" :key="i">
            <Accordion type="single" collapsible>
              <AccordionItem value="item-1">
                <AccordionTrigger class="font-semibold text-left gap-1">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla hendrerit ligula in quam sagittis elementum. Curabitur non
                  pretium velit?
                </AccordionTrigger>
                <AccordionContent class="text-xs font-light">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla hendrerit ligula in quam sagittis elementum. Curabitur non
                  pretium velit. Etiam in lobortis mauris. Nulla ornare mi eu sapien imperdiet, id varius justo fringilla. Nullam vitae
                  lacinia libero. Vestibulum in nisi leo. Integer tincidunt, turpis id maximus viverra, lacus augue egestas nibh, non
                  efficitur ligula nulla at lectus.
                </AccordionContent>
              </AccordionItem>
            </Accordion>
          </template>
        </div>
      </div>
    </section>
  </div>
</template>

<style scoped></style>
