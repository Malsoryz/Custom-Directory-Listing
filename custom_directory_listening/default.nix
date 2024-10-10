{ pkgs ? import <nixpkgs> {} }:

pkgs.mkShell {
  buildInputs = [ pkgs.php ];

  shellHook = ''
    echo "Running development server..."
    php -S localhost:8000
  '';
}