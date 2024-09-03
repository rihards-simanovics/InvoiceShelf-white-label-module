import WhiteLabelSetting from './views/WhiteLabelSetting.vue'
import moduleLocales from '~/locales/locales'
import '../sass/module.scss'

window.InvoiceShelf.booting((app, router) => {
  window.InvoiceShelf.addMessages(moduleLocales)

  router.addRoute('settings', {
    path: 'white-label',
    name: 'white.label',
    component: WhiteLabelSetting,
  })

})
