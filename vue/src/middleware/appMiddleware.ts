export default async () => {
  await Promise.all([useUserStore().getCurrentUser(), useConfigStore().getConfig()])
}
