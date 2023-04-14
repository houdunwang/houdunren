import { defineStore } from 'pinia'

export default defineStore('adminMenu', () => {
  const menuState = ref(true)

  const toggleMenu = () => {
    menuState.value = !menuState.value
  }
  return { menuState, toggleMenu }
})
