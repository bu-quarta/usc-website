<script setup lang="ts">
  import { Button } from "@/components/ui/button"

  import { Stepper, StepperDescription, StepperItem, StepperSeparator, StepperTitle, StepperTrigger } from "@/components/ui/stepper"
  import { Check, Circle, Dot } from "lucide-vue-next"

  const steps = [
    {
      step: 1,
      title: "September XX, 2024, 11: 59 AM",
      description: "SIGNED",
    },
    {
      step: 2,
      title: "September XX, 2024, 11: 59 AM",
      description: "FORWARDED",
    },
    {
      step: 3,
      title: "September XX, 2024, 11: 59 AM",
      description: "RECEIVED",
    },
  ]
</script>

<template>
  <Stepper orientation="vertical" class="mx-auto flex w-full max-w-md flex-col justify-start gap-10">
    <StepperItem v-for="step in steps" :key="step.step" v-slot="{ state }" class="relative flex w-full items-start gap-6" :step="step.step">
      <StepperSeparator
        v-if="step.step !== steps?.[steps.length - 1]?.step"
        class="absolute left-[18px] top-[38px] block h-[105%] w-0.5 shrink-0 rounded-full bg-muted group-data-[state=completed]:bg-primary"
      />

      <StepperTrigger as-child>
        <Button
          :variant="state === 'completed' || state === 'active' ? 'default' : 'outline'"
          size="icon"
          class="z-10 rounded-full shrink-0"
          :class="[state === 'active' && 'ring-2 ring-ring ring-offset-2 ring-offset-background']"
          disabled
        >
          <Check v-if="state === 'completed'" class="size-5" />
          <Circle v-if="state === 'active'" />
          <Dot v-if="state === 'inactive'" />
        </Button>
      </StepperTrigger>

      <div class="flex flex-col gap-1">
        <StepperTitle :class="[state === 'active' && 'text-primary']" class="text-sm font-medium transition lg:text-base">
          {{ step.title }}
        </StepperTitle>
        <StepperDescription
          :class="[
            state === 'active' && 'text-primary',
            step.description === 'SIGNED' && 'text-[#33C400]',
            step.description === 'FORWARDED' && 'text-primary',
            step.description === 'RECEIVED' && 'text-[#0099CB]',
          ]"
          class="sr-only text-xs font-semibold transition md:not-sr-only lg:text-sm"
        >
          {{ step.description }}
        </StepperDescription>
      </div>
    </StepperItem>
  </Stepper>
</template>
