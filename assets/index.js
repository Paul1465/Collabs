import SidebarMenu from './components/SidebarMenu'

export default {
  install (Vue) {
    Vue.component('sidebar-menu', SidebarMenu)
  }
}

export { SidebarMenu }