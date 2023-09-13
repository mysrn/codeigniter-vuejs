<template>
  <main>
    <section class="grid justify-center gap-3 text-center my-5">
      <div class="flex gap-5 justify-center items-center text-4xl my-5">
        <Transition name="slide-left" appear>
          <img src="@/assets/logos/vue.png" class="lg:w-24 w-20 duration-300" alt="Vite logo" />
        </Transition>
        +
        <Transition name="slide-top" appear>
          <img src="@/assets/logos/ci.png" class="lg:w-24 w-20 duration-300 delay-100" alt="CodeIgniter logo" />
        </Transition>
        =
        <Transition name="slide-right" appear>
          <img src="@/assets/logos/ci-vue.webp" class="lg:w-24 w-20 duration-300 delay-200" alt="Codeigniter vite logo" />
        </Transition>
      </div>
        <Transition name="slide-left" appear>
          <h1 class="text-4xl font-bold duration-500 delay-500">Welcome To CodeIgniter Vite App Starter</h1>
        </Transition>
    </section>
  </main>
</template> 
