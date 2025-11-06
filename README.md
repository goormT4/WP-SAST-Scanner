# T4_WP_SASTScan

- CI: Semgrep 자동 스캔 (src/wp_plugins/** 변경 시 트리거)
- 커스텀 규칙은 `.semgrep/` 폴더에 있음
- Optional: Semgrep Cloud 연동을 위해 repo secret `SEMGREP_APP_TOKEN` 추가
