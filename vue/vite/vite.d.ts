/// <reference types="vite/client" />

interface ImportMetaEnv {
  VITE_API_URL: string
}

interface ImportMeta {
  readonly env: ImportMetaEnv
}
