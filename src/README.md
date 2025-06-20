# Revive AdServer Source Directory

This directory should contain the extracted Revive AdServer files.

## Expected Structure

After following the setup instructions in the main README, this directory should contain:

```
src/
└── revive-adserver-5.5.2/
    ├── www/
    ├── lib/
    ├── plugins/
    ├── scripts/
    └── ... (other Revive AdServer files)
```

## Setup Instructions

If this directory is empty, please follow the download and extraction instructions in the main README.md:

1. Download Revive AdServer v5.5.2 from: https://www.revive-adserver.com/download/
2. Extract the archive to this `src/` directory
3. Ensure the final path is: `src/revive-adserver-5.5.2/`

## Quick Download Command

```bash
# Run from the project root directory
curl -L -o revive-adserver-5.5.2.tar.gz "https://download.revive-adserver.com/revive-adserver-5.5.2.tar.gz"
tar -xzf revive-adserver-5.5.2.tar.gz -C src/
rm revive-adserver-5.5.2.tar.gz
```

For complete setup instructions, see the main [README.md](../README.md) in the project root. 