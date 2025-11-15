
# Script PowerShell para sincronizar cambios en varios repositorios GitHub

$branch = "main"
$commitMsg = $args[0]
if (-not $commitMsg) {
    $commitMsg = "Sincronización automática"
}

Write-Host "🔄 Preparando sincronización en rama $branch..."

# Commit
git add .
git commit -m "$commitMsg"

# Push a todos los remotos
Write-Host "⬆️ Empujando cambios..."
git push origin $branch
git push repo2 $branch
git push repo3 $branch
git push repo4 $branch

# Pull de todos los remotos
Write-Host "⬇️ Trayendo cambios..."
git pull origin $branch
git pull repo2 $branch
git pull repo3 $branch
git pull repo4 $branch

Write-Host "✅ Sincronización completa en todos los repositorios"
