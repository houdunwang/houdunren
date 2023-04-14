export default async () => {
  await Promise.all([useUserStore().getCurrentUser()])
}
