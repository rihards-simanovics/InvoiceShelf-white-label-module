import WhiteLabelSetting from './views/WhiteLabelSetting.vue'
import moduleLocales from '~/locales/locales'
import '../sass/module.scss'

window.Crater.booting((app, router) => {
  window.Crater.addMessages(moduleLocales)

  router.addRoute('settings', {
    path: 'white-label',
    name: 'white.label',
    component: WhiteLabelSetting,
  })

})
