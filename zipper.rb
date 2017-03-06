#!/usr/bin/env ruby

PRODUCTION = ARGV.length == 0 || ARGV.include?('--production')
DEVELOPMENT = ARGV.length == 0 || ARGV.include?('--development')

ignored = [
  "*.DS_Store*",
  "*.git*",
  "*.svn*",
  "*assets*",
  "*branches*",
  "*node_modules*",
  "ignoring.txt",
  "*scss*",
  "*tags*",
  "*tmp*",
  "*trunk*",
  "remetric.zip",
  "zipper.rb"
].map{ |i| "-x '../remetric/#{i}'" }.join(" ")

debug_true = "const debug = true;"
debug_false = "const debug = false;"
show_errors = "*/\nini_set(\"display_errors\",1);\nini_set(\"display_startup_errors\",1);\nerror_reporting(-1);"
hide_errors = "ini_set(\"display_errors\",1);\nini_set(\"display_startup_errors\",1);\nerror_reporting(-1);\n*/"

if PRODUCTION
  File.open("remetric.php") { |file|
    contents = file.read.gsub debug_true, debug_false
    contents = contents.gsub show_errors, hide_errors
    File.open("remetric.php", "w") { |f| f << contents }
  }

  `rm -rf remetric.zip`
  `zip -r remetric.zip ../remetric #{ignored}`

  # `rm -rf trunk`
  # `rm -rf remetric`
  # `unzip remetric.zip`
  # `mv remetric trunk`
end

if DEVELOPMENT
  File.open("remetric.php") { |file|
    contents = file.read.gsub debug_false, debug_true
    contents = contents.gsub hide_errors, show_errors
    File.open("remetric.php", "w") { |f| f << contents }
  }
end
